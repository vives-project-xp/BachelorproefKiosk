const express = require("express")
const port = 3000
const cors = require("cors")

const app = express()
app.use(cors());
app.use(express.urlencoded({ extended: true}));

app.get('/backend/', (req, res) => {
    res.send('Verbinding met de backend is werkend!')
})

app.listen(port, () => {
    console.log(`Backend app listening on port ${port}`)
})