const express = require("express")
const port = 3000
const cors = require("cors")
const util = require("util")
const db = require("./db")
const fileCode = require("./fileHelper")

const app = express()
app.use(cors());
app.use(express.json())
app.use(express.urlencoded({ extended: true}));
global.__dirname = process.cwd();

app.get('/backend/', (req, res) => {
    res.send('Verbinding met de backend is werkend!')
})
app.get('/backend/getFiche/:id', (req, res) => {
    db.getFiche(req,res, req.params.id)
})
app.get('/backend/getFiches/:richtingid', (req, res) => {
    //als richiting id een nummer is dan worden alle fiches van deze richting terug gestuurd, anders alles
    if(!isNaN(req.params.richtingid - 0)){
        db.getFiches(req,res,req.params.richtingid)
    }else{
        db.getFiches(req,res)
    }
})
app.post('/backend/addFiche', (req, res) => {
    db.addFiche(req,res, req.body)
})
app.delete('/backend/removeFiche/:id', (req, res) => {
    db.removeFiche(req,res, req.params.id)
})
app.put("/backend/updateFiche/",(req, res)=>{
    db.updateFiche(req, res, req.body)
})
app.get('/backend/getRichtingen', (req, res) => {
    db.getRichtingen(req,res)
})
app.post('/backend/addRichting/:naam', (req, res) => {
    db.addRichting(req,res,req.params.naam)
})
app.delete('/backend/removeRichting/:id', (req, res) => {
    db.removeRichting(req,res, req.params.id)
})
app.put("/backend/updateRichting/:id/:naam",(req, res)=>{
    db.updateRichting(req, res, req.params.naam, req.params.id)
})
app.post("/backendIMG/upload", async (req, res) => { //alleen hier rsa string in de url omdat body = image
      try{
        await util.promisify(fileCode.upload.single("file"))(req , res);
        if(req.file == undefined){
          return res.status(400).send("Please upload a file!");
        }
        res.json("File uploaded successfully");
      }catch(error){
        console.error(error)
        res.status(400).send(error)
      }
  });
  app.get("/backendIMG/:id", (req, res) => {
    fileCode.sendFile(req, res)
  })
  app.delete("/backendIMG/:id", (req, res) => { //#
    fileCode.deleteFile(req,res)
  })
app.listen(port, () => {
    console.log(`Backend app listening on port ${port}`)
})