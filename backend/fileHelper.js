const multer = require("multer")
const path = require("path")
const fs = require("fs")

const maxSize = 2 * 1024 * 1024 // max file size

// Start by creating some disk storage options:
const storage = multer.diskStorage({
    destination: function (req, file, callback) {
        callback(null, __dirname + '/IMG_uploads/');
    },
    // Sets file(s) to be saved in uploads folder in same directory
    filename: function (req, file, callback) {
        callback(null, file.originalname);
    }
    // Sets saved filename(s) to be original filename(s)
  })
  
// Set saved storage options:
const upload = multer({ 
    storage: storage ,
    fileFilter: function(req, file, callback) {
        var ext = path.extname(file.originalname);
        if(ext !== '.png' && ext !== '.jpg' && ext !== '.jpeg') {
            return callback(new Error('Only images are allowed'))
        }
        callback(null, true)
    },
    limits: { fileSize: maxSize},}
)
var sendFile = (req, res) =>{
    const filename = req.params.id;
    const directoryPath = __dirname + "/IMG_uploads/"
    res.set({
        "CacheControl":"no-cache",
        "Pragma":"no-cache",
        "Expires":"-1"
      }).download(directoryPath + filename, filename, (err) => {
        if(err){
            res.set({
                "CacheControl":"no-cache",
                "Pragma":"no-cache",
                "Expires":"-1"
              }).status(500).send({
                message: "Could not download the file. " + err
            })
        }
    })
}

var deleteFile = (req, res) =>{
    const filename = req.params.id;
    const directoryPath = __dirname + "/IMG_uploads/"

    fs.unlink(directoryPath + filename, (err) => {
        if(err){
            // res.status(500).send({
            //     message: "Could not delete the file. " + err
            // })
            console.error("kon bestand niet verwijderen.",err)
            return
        }
    })

    res.status(200).send({
        message: "File is deleted."
    })
}
module.exports = {upload, sendFile, deleteFile}