<!DOCTYPE HTML>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrowPath - Shop</title>
    @vite(['resources/css/shop-style.css', 'resources/js/shop.js', 'resources/css/app.css'])
</head>

<body>
    <header>
        <div class="navigation-container">
            <a class="growpath-logo">GROWPATH</a>

            <nav class="navigation-bar">
                <ul>
                    <li><a href="/dashboard">HOME</a></li>
                    <li><a href="/inventory">INVENTORY</a></li>
                    <li><a href="/shop">MARKET</a></li>
                    <li><a href="/leaderboard">LEADERBOARD</a></li>
                    <li><a href="/profile">PROFILE</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="shop-container">
            <div class="shop-menu">
                <h3 class="active">Avatar</h3>
                <h3>Frame</h3>
                <h3>Plant</h3>
                <h3>Background</h3>
                <h3>Gold</h3>
            </div>
            <div class="shop-content">
                <div class="active">
                    <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore
                    </p>
                </div>
                <div>
                    <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti,
                    </p>
                </div>
                <div>
                    <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat
                    </p>
                </div>
                <div>
                    <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat
                    </p>
                </div>
                <div>
                    <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat
                    </p>
                </div>
            </div>
        </div>

        <div class="right-side">
            <div class="top-row">
                <div class=market>
                    <p>MARKET</P>
                </div>
        
                <div class="gold-display">
                </div>
            </div>

            <div class="item-preview">
            </div>

            <button class="buy-button" role="button">BELI</button>
    </main>
</body>