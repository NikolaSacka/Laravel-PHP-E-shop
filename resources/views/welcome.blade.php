@extends('layout')
@section('title', 'Welcome')
@section('content')

<div id="page" class="container">

                <div class="column1">
                    <div class="title">
                        <h2>Design & Shop</h2>
                        <span class="byline">Welcome to unofficial LeftWear website</span>
                    </div>
                    <p>Welcome to an unofficial WebSite page of LeftWear brand. We allow you to design your own brand, or shop at our
                        <a href="{{'shop'}}">shop</a>. This site is built in Laravel framework by <br>Nikola Sacka (s31/18) as an project for PWA class. It took him few days to start Laravel at first, but when he menaged to start it, he figured it out and got to work.
                        <br>Everything on this site in the background was engineered by <strong> Nikola Sacka.</strong>
                    <a href="https://github.com/NikolaSacka" class="button">GitHub</a>
                    <a href="https://www.instagram.com/bata_shale/" class="button">Instagram</a></p>
                </div>
                <div class="column3">
                    <div class="title">
                        <h2>Design</h2>
                    </div>
                    <img src="images/pic01.jpg" width="282" height="150" alt="" />
                    <p>Let out the creative side of you
                    <a href="{{'design'}}" class="button">Design now</a></p>
                </div>
                <div class="column4">
                    <div class="title">
                        <h2>Shop</h2>
                    </div>
                    <img src="images/pic02.jpg" width="282" height="150" alt="" />
                    <p>Explore and shop for our products
                    <a href="{{'shop'}}" class="button">Shop now</a></p>
                </div>
            </div>
            <div id="portfolio-wrapper">
                <div id="portfolio" class="container">
                    <div class="title">
                        <h2>About us</h2>
                        <span class="byline">Want to become a part of a team?</span> </div>
                    <div class="column1">
                        <div class="box">
                            <span class="icon icon-phone"></span>
                            <h3>Contact us</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, fugiat.</p>
                            <a href="#" class="button">Etiam posuere</a> </div>
                    </div>
                    <div class="column2">
                        <div class="box">
                            <span class="icon icon-folder-open"></span>
                            <h3>Our team</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, fugiat.</p>
                            <a href="#" class="button">Etiam posuere</a> </div>
                    </div>
                    <div class="column3">
                        <div class="box">
                            <span class="icon icon-globe"></span>
                            <h3>Location</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, fugiat.</p>
                            <a href="#" class="button">Etiam posuere</a> </div>
                    </div>
                    <div class="column3">
                        <div class="box">
                            <span class="icon icon-blogger-sign"></span>
                            <h3>Follow Us</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, fugiat.</p>
                            <a href="#" class="button">Etiam posuere</a> </div>
                    </div>
                </div>
            </div>



@endsection()
