<?php include './headerForBlogs.php'; ?>
<link rel="stylesheet" href="../css/nodeGettingStarted.css">

<link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/styles/mono-blue.min.css">


<div class="containBlog">
    <div class='intro'>
        <h2>Getting started with node.js and express.js</h2>
        <img src='../images/Nodejs.jpg' width="300px" alt='Some Text' /><br><br>
    </div>
    <main class="main">
        <p><b>1)</b> Make a folder and then in the commandline cd into that folder.</p>
        <p><b>2)</b> init -y to ceate packag.json</p>
        <p><b>3)</b> Go inside package.json turn "test" into "start": "node app.js"</p>
        <p><b>4)</b> npm i express to install express</p>
        <p><b>5)</b> make file app.js and paste the following express starter code.</p>
    </main>

    <pre class='thePre'><code class="javascript"> 
    const express = require('express')
    const app = express()
 
    app.get('/', function (req, res) {
    res.send('Hello World')
    })
    
    app.listen(3000)
</code></pre><br>
    <main class="main">
        <p><b>6)</b>npm i hbs to install handlebars templating engine. Make sure ctrl+c to exit out server</p>
        <p><b>7)</b> Make a folder for handlebars, it must be called views.</p>
        <p><b>8)</b>Make files such as index.hbs instead of .html inside the views folder.
            you can still use !+[tab] to get the html boilerplate.
        </p>
        <p><b>9)</b>Inside app.js, put close to top, app.set("view engine", "hbs");</p>
        <p><b>10)</b>Inside app.js, make app.get("/", (req, res) => { res.render("index") } ) </p>
        <p><b>11)</b>You are now all set up with node.js and express on your local machine</p>
        <p><b>12)</b>Since we are working with hbs, make another file in views call it pageTwo.hbs</p>
        <p><b>13)</b>you might have to ctrl+c after making a new file or changes unless your using nodemon</p>
        <p><b>14)</b>make an anchor tag in index.hbs and link it to pageTwo<br> &lt;a href='/pageTwo'>Try Page Two&lt;/a> </p>
    </main>





</div>









<?php include 'footerForBlogs.php'; ?>