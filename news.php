<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech News</title>
</head>
<style>
      

        .containers {
            width: 90%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .news-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .news-item {
            flex: 1 1 300px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 1);
            border-radius: 10px;
            overflow: hidden;
            margin-top: 5px;
            transition: transform 0.2s ease-in-out;
        }

        .news-item:hover {
            transform: scale(1.05);
        }

        .news-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
        }

        .news-item h3 {
            font-size: 18px;
            margin: 20px 0;
            margin-left: 7px;
        }

        .news-item p {
            font-size: 14px;
            margin: 10px 0;
            margin-left: 7px;
        }

        .news-item a {
            color: #333;
            text-decoration: none;
            display: inline-block;
            background-color: #ddd;
            padding: 5px 10px;
            border-radius: 5px;
            margin-left: 7px;
            transition: background-color 0.3s ease-in-out;
        }

        .news-item a:hover {
            background-color: #ccc;
        }
    </style>
<body>
<?php
include('nav.php');

$api_key = 'd251fdab76094c489aab3481214fb4b2';  
$api_url = 'https://newsapi.org/v2/top-headlines?sources=techcrunch&apiKey=' . $api_key ;


$curl = curl_init($api_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);


if ($response === FALSE) {
    echo '<div class="container">Error: Unable to fetch news data. Check your API key and URL.</div>';
} else {
    $data = json_decode($response, true);

    if ($data['status'] == 'ok') {
        $articles = $data['articles'];
        ?>
        <div class="containers">
            <h2>Apple News</h2>
            <div class="news-container">
                <?php
                if (empty($articles)) {
                    echo '<p>No articles found.</p>';
                } else {
                    foreach ($articles as $article) { ?>
                        <div class="news-item">
                            <h3><?php echo $article['title']; ?></h3>
                            <p><?php echo $article['description']; ?></p>
                            <p>Published at: <?php echo $article['publishedAt']; ?></p>
                            <img src="<?php echo $article['urlToImage']; ?>" alt="Article Image">
                            <p><a href="<?php echo $article['url']; ?>" target="_blank">Read more</a></p>
                        </div>
                    <?php }
                }
                ?>
            </div>
        </div>
        
        <script>
            console.log(<?php echo json_encode($data); ?>);
        </script>
        
        <?php
    } else {
        echo '<div class="container">Error: ' . $data['message'] . '</div>';
    }
}


curl_close($curl);

include('footer.php');
?>
</body>
</html>
