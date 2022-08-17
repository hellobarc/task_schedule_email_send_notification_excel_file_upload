<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Birthday Greeting</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	{{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
<style>
.section{
    /* background-image: linear-gradient(to right top, #835a08, rgb(158, 109, 9), #e0ab40, #e9b857, #e9bf6a); */
    background: rgb(248,219,168);
background: linear-gradient(90deg, rgba(248,219,168,1) 0%, rgba(246,203,127,1) 20%, rgba(246,203,127,1) 55%);
    /* height: 926px;*/
    /*width: 428px; */
    padding: 0;
    margin: 0;
    /*height: 100vh;*/
    /*text-align: center;*/
}


.header-img-1{
    width: 30%;
    margin-top: 25px;
    margin-left: 70px;
   
}
.header-img-2{
    width: 50%;
    margin-top: 25px;
   
}


.heading{
    text-align: center;
}
.heading h1 {
    font-size: 5rem;
    font-weight: 700;
}
.name{
    text-align: center;
}
.name h1{
    font-weight: 600;
    font-size: 45px;
}
.text{
    text-align: center;
    margin-top: 20px;
}
.text-1{
    font-size: 1.8rem;
    font-weight: 450;
    margin: 0 28%;
}
.text-2{
    font-size: 1.8rem;
    font-weight: 450;
    margin: 0 30%;
}
.greeting-box{
    position: relative;
}
.line{
    
}
.line-img {
    position: absolute;
    left: 21%;
    top: 32%;
}
.greeting-image-box{
    text-align: center;
}
.greeting-img{
    width: 68%;
}
/* responsive section */
@media only screen and (max-width: 412px) {
    .heading{
        margin-top: 20px;
    }
    .header-img-1{
        width: 67%;
        margin-left: 10px;
    }
    .header-img-2{
        width: 100%;
      
    }
    .heading h1 {
        font-size: 2.7rem;
    }
    .name h1 {
        
        font-size: 1.9rem;
    }
    .text-1 {
        font-size: 1.4rem;
        margin: 0 4%;
    }
    .text-2 {
        font-size: 1.4rem;
        margin: 0 5%;
    }
    .line-img{
        display: none;
    }
    .greeting-img {
        width: 100%;
    }
  }
</style>
</head>
<body>
	<section class="section">
		<div class="header" style="display: flex; justify-content: space-between;">
            <div class="header-image-box">
                <img src="https://hellobarc.com/birtdaygreeting/images/logo-Update.png" alt="" class="header-img-1">
            </div>
        
            <div class="header-image-box">
                <img src="https://hellobarc.com/birtdaygreeting/images/logo.png" alt="" class="header-img-2">
            </div>
        </div>
	
		<div class="greeting-box">
			<!--<div class="line">-->
			<!--	<img src="https://hellobarc.com/birtdaygreeting/images/line.png" alt="" class="line-img">-->
			<!--</div>-->
			<div class="heading">
				<h1 >Happy Birthday</h1>
			</div>
			<div class="name">
				<h1>**{{$name}}**</h1>
			</div>
			<div class="text">
				<p class="text-1">The way you throw yourself into your study and give your best is truly praiseworthy!</p> <br>
				<p class="text-2">Congratulation to you and may have the most incredible celebration today as you've certainly earned it!</p>
			</div>
		</div>
	
		<div class="greeting-image-box">
			<img src="https://hellobarc.com/birtdaygreeting/images/05.png" alt="" class="greeting-img">
		</div>
				
	</section>
</body>
</html>