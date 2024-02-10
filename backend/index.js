const express = require("express")
const port = 3000
const cors = require("cors")
const db = require("./db")

const app = express()
app.use(cors());
app.use(express.json())
app.use(express.urlencoded({ extended: true}));

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
app.get('/backend/addFiche', (req, res) => {
    db.addFiche(req,res, req.body)
})
app.get('/backend/removeFiche/:id', (req, res) => {
    db.removeFiche(req,res, req.params.id)
})
app.get('/backend/getRichtingen', (req, res) => {
    db.getRichtingen(req,res)
})
app.get('/backend/addRichting/:naam', (req, res) => {
    db.addRichting(req,res,req.params.naam)
})
app.get('/backend/removeRichting/:id', (req, res) => {
    db.removeRichting(req,res, req.params.id)
})
app.listen(port, () => {
    console.log(`Backend app listening on port ${port}`)
})