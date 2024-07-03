<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            font-family: 'Poppins', sans-serif;
            margin-top: 50px;
            text-align: justify;
        }

        .header {
            text-align: center;
        }

        .team {
            display: flex;
            flex-direction: row;
            margin-bottom: 100px;
            justify-content: center; /* Center the team cards */
            align-items: center;
        }

        .card {
            width: 270px;
            text-align: center;
            margin: 25px; /* Adjusted margin for better spacing */
            align-items: center;
            padding: 15px;
        }
        .card:hover {
            transform: scale(1.1); /* Zoom effect on hover */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }

        .img {
            border-radius: 50%;
            width: 200px;
            margin-top: 5px;
            border: 2px solid pink;
        }

        .name {
            font-weight: bold;
            color: pink;
            margin-bottom: 0px;
        }
    </style>
</head>
<body>

<img src="img/aboutus.jpg" style="width: 100%; display: block;">

    <div class="container">
        <h1 class="header">What is Getter Glow?</h1><br>

        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Getter Glow is an engaging online destination for beauty lovers looking for the best guide to the newest and most popular makeup products on the market. With a focus on honest and informative ratings, the website provides in-depth reviews of various cosmetic brands, from foundation to lipstick, as well as providing insight into the latest beauty trends. Getter Glow's website design is designed to be attractive and easy to navigate, giving visitors a pleasant experience when browsing the review pages. A clean and responsive display ensures that information can be easily accessed from a variety of devices, including smartphones and tablets. Getter Glow users can rely on this website as a trusted source for choosing products that suit their needs and preferences. Each review is accompanied by product photos, providing a comprehensive overview of the quality and results to expect. Getter Glow also highlights the beauty community with a comments feature, allowing users to share experiences, tips, and suggestions with fellow makeup lovers. In this way, this website is not only a shopping guide but also a place to interact and connect with a community that has similar interests. With a commitment to honesty and accuracy, Getter Glow helps users make informed decisions when choosing beauty products, making it the premier destination for those who want to explore the world of makeup with a sharp, knowledgeable eye.</p>
        <br><br><br>

        <h1 class="header">Our Team</h1>

        <div class="team">
            <div class="card">
                <img src="img/billa.png" class="img">
                <div class="name">Nabilla Tsani Ayasi</div>
                H1D022058<br>
                as Front End and UI/UX
            </div>

            <div class="card">
                <img src="img/bertha.jpg" class="img">
                <div class="name">Claresta Berthalita Jatmika</div>
                H1D022050<br>
                as Back End and UI/UX
            </div>
        </div>
    </div>


</body>
</html>
