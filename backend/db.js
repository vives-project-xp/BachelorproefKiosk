const dotenv = require("dotenv")
const mysql = require("mysql")

let configConnect = (returnCode) => {
    dotenv.config();
    const dbhost = process.env.DB_HOST;
    const dbuser = process.env.DB_USER;
    const dbpass = process.env.DB_PASS;
    const database = process.env.DB_DTBS;

    let connection = mysql.createConnection({
        host: dbhost,
        user: dbuser,
        password: dbpass,
        database: database,
    });
    connection.connect(error => {
        if(error){
            console.log("error: Unable to connect to database.",error.message)
        }else{
            console.log("Verbonden met succes.")
            returnCode(connection)
        }
    });
}
const getFiche = (req, res,id) => {
    configConnect(function(connection){
        const queryry = "SELECT *,(select titel from richting where id=richtingId) as afstudeerRichting FROM fiche where id = ?"
        connection.query(queryry, [id], (err, data) => {
        if(err){
            res.status(404).send("interne database error")
            console.log("interne database error")
        }else{
            res.status(200).send(data);
        }
        connection.end()
    });})
}
const getFiches = (req, res, richtingId) => {
    configConnect(function(connection){
        var queryry = "SELECT id, titel, tekst, richtingId FROM fiche"
        if(richtingId!=undefined){
            queryry+=" where richtingId=?"
        }
        connection.query(queryry,[richtingId], (err, data) => {
            if(err){
                res.status(404).send("interne database error")
                console.log("interne database error")
            }else{
                res.status(200).send(data);
            }
            connection.end()
        });})
}
const addFiche = (req, res, objectData)=>{
    configConnect(function(connection){
        const queryry = "insert into fiche values(NULL, ?,?,?,?,?,?,?,?,?)"
        connection.query(queryry,[objectData.studentNaam, objectData.bedrijf, objectData.titel,objectData.link,objectData.tekst, objectData.afbeelding1,objectData.afbeelding2,objectData.hashtags,objectData.richtingId], (err, data) => {
            if(err){
                res.status(404).send("interne database error")
                console.log("interne database error")
            }else{
                res.status(200).send("ok");
            }
            connection.end()
        });})
}
const removeFiche = (req, res, id)=>{
    configConnect(function(connection){
        const queryry = "delete from fiche where id=?"
        connection.query(queryry,[id], (err, data) => {
            if(err){
                res.status(404).send("interne database error")
                console.log("interne database error")
            }else{
                res.status(200).send("ok");
            }
            connection.end()
        });})
}
const getRichtingen = (req, res) => {
    configConnect(function(connection){
        const queryry = "SELECT * FROM richting"
        connection.query(queryry, (err, data) => {
            if(err){
                res.status(404).send("interne database error")
                console.log("interne database error")
            }else{
                res.status(200).send(data);
            }
            connection.end()
        });})
}
const addRichting = (req, res, naam)=>{
    configConnect(function(connection){
        const queryry = "insert into richting values(NULL, ?)"
        connection.query(queryry,[naam], (err, data) => {
            if(err){
                res.status(404).send("interne database error")
                console.log("interne database error")
            }else{
                res.status(200).send("ok");
            }
            connection.end()
        });})
}
const removeRichting = (req, res, id)=>{
    configConnect(function(connection){
        const queryry = "delete from richting where id=?"
        connection.query(queryry,[id], (err, data) => {
            if(err){
                res.status(404).send("interne database error")
                console.log("interne database error")
            }else{
                res.status(200).send("ok");
            }
            connection.end()
        });})
}
module.exports = {getRichtingen, getFiche, getFiches, addRichting,addFiche, removeFiche, removeRichting}