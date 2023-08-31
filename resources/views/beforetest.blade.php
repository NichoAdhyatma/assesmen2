<head>
  <title>Global</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="HTML5 website template">
  <meta name="keywords" content="global, template, html, sass, jquery">
  <meta name="author" content="Bucky Maler">
  <link rel="stylesheet" href="assets/css/main.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">     
  <style>
    .intro{
        position:relative;
        display:-webkit-box;
        display:-webkit-flex;
        display:-ms-flexbox;
        display:flex;
        width:100%;
        max-width:75%;
        height:100%;
        -webkit-box-orient:vertical;
        -webkit-box-direction:normal;
        -webkit-flex-direction:column;
        -ms-flex-direction:column;
        flex-direction:column;
        -webkit-box-pack:center;
        -webkit-justify-content:center;
        -ms-flex-pack:center;
        justify-content:center;
        margin:0 auto;
        align-items:center;
    }
    @media (max-width: 1180px){
        .intro{
            max-width:100%
        }
    }
    .intro--banner{
        position:relative;
        height:475px
    }
    .intro--banner::before{
        content:"";
        position:absolute;
        bottom:20px;
        left:-15px;
        right:0;
        height:2px;
        background-color:#282828
    }
    .intro--banner::after{
        content:"";
        position:absolute;
        bottom:18px;
        left:0;
        width:30px;
        height:4px;
        background-color:#0f33ff
    }
    .intro--banner h1{
        position:relative;
        font-size:68px;
        font-weight:900;
        line-height:1;
        z-index:1;
        text-align: center;
    }
    .intro--banner button {
        background-color:#0f33ff;
        font-weight:700;
        text-transform:uppercase;
        font-size:20px;
        width: 100%; 
        height: 60px; 
        color: #ffff;
        border-color: #ffff;
    }
    .testButton{
        background-color:#0f33ff;
        font-weight:700;
        text-transform:uppercase;
        font-size:20px;
        width: 60%; 
        height: 60px; 
        color: #ffff;
        border-color: #ffff;
    }
    .special-link {
        display: inline-block;
        padding-left: 28.75%;
    }
  </style>
</head>

<style>
</style>
<body>
    <div class="intro">
        <div class="intro--banner" >
            <h1>Tele Assesment<br>Interaktif<br>Psikologi</h1>
            <a href="{{ route('login') }}" class="special-link">
                <button class="testButton">Bergabung</button>
            </a>
        </div>
    </div>
    <div class="intro--options">
    <a href="#0">
        <h3>Interview Test</h3>
        <p>The task of Face Sentiment Analysis involves detecting the sentiment portrayed by a person's face.</p>
    </a>
    <a href="#0">
        <h3>Validation Test</h3>
        <p>The task of Face Sentiment Analysis involves detecting the sentiment portrayed by a person's face.</p>
    </a>
    <a href="#0">
        <h3>Cognitive Style Test</h3>
        <p>The task of Voice Sentiment Analysis involves assigning a positive or negative score for how the tone is perceived</p>
    </a>
    </div>
    </div>
    <div class="intro">
        <div class="intro--banner">
        <h1>Tele Assesment<br>Interaktif<br>Psikologi</h1>
        <button class="cta">Bergabung
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 118" style="enable-background:new 0 0 150 118;" xml:space="preserve">
            <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
            <path d="M870,1167c-34-17-55-57-46-90c3-15,81-100,194-211l187-185l-565-1c-431,0-571-3-590-13c-55-28-64-94-18-137c21-20,33-20,597-20h575l-192-193C800,103,794,94,849,39c20-20,39-29,61-29c28,0,63,30,298,262c147,144,272,271,279,282c30,51,23,60-219,304C947,1180,926,1196,870,1167z"/>
            </g>
            </svg>
            <span class="btn-background"></span>
        </button>
        <img src="assets/img/introduction-visual1.png" alt="Welcome">
        </div>
        <div class="intro--options">
        <a href="#0">
            <h3>Interview Test</h3>
            <p>The task of Face Sentiment Analysis involves detecting the sentiment portrayed by a person's face.</p>
        </a>
        <a href="#0">
            <h3>Validation Test</h3>
            <p>The task of Face Sentiment Analysis involves detecting the sentiment portrayed by a person's face.</p>
        </a>
        <a href="#0">
            <h3>Cognitive Style Test</h3>
            <p>The task of Voice Sentiment Analysis involves assigning a positive or negative score for how the tone is perceived</p>
        </a>
        </div>
    </div>
</body>