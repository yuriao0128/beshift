<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BE SHIFT</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/ef226e501a.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="header">
        <div class="header-container">
            <img src="/images/index/logo.png" class="logo">
            <nav class="nav">
                <a href="#about">ABOUT</a>
                <a href="#how">HOW</a>
                <a href="#register" class="register-button">新規会員登録</a>
            </nav>
        </div>
    </header>

    <main>
        <!-- Heroセクション -->
        <section class="hero">
            <div class="hero-left">
                <h1 class="hero-title">BE SHIFT</h1>
                <p class="hero-subtitle">ライフイベントを超えて<br>キャリア持続を支援するサービス</p>
                <ul class="hero-features">
                <li>
                    <img src="/images/index/icon1.jpg" alt="子育てアイコン" class="feature-icon" style="width: 100px; height: 100px;">
                    <p>子育てをしながら<br>コア人材として働く機会</p>
                </li>
                <li>
                    <img src="/images/index/icon2.jpg" alt="介護アイコン" class="feature-icon" style="width: 100px; height: 100px;">
                    <p>介護をしながら<br>キャリアを持続する選択</p>
                </li>
            </ul>
            </div>
            <div class="hero-right">
            <div class="cta-card">
        <button class="cta-button" onclick="window.location.href='{{ route('user.register') }}'">アカウント作成</button>
        <p class="cta-text">アカウントをお持ちの方</p>
        <button class="cta-button secondary" onclick="window.location.href='{{ route('users.login') }}'">ログイン</button>
    </div>
            </div>
        </section>

        <main>
        <section id="about" class="about-section">
            <h2 class="section-title">ABOUT</h2>
            <h3 class="about-heading">ライフイベントとキャリアを両立する選択を</h3>
            <div class="about-desc">
            <p>
                BE SHIFTは、ライフイベント（子育て・介護など）がきっかけにキャリア持続が困難となる方に向け、ライフイベントを重視しながら活躍する機会を提供するサービスです。「正社員としてフルコミットで働くか」「非正規雇用としてプライベートを重視して働くか」の二者択一ではない選択肢を模索する方へ、<span class="highlight">ライフイベントの時間を大切にしながら、キャリアを活かし持続する選択肢</span>を提供します。
            </p>
            </div>
        </section>

        <section id="features" class="features-section">
    <div class="features-container">

        <div class="feature">
        <div class="h-1 w-full bg-gradient-to-r from-[#66CFD5] to-[#A4E0E4]"></div>
            <div class="feature-background">
                <img src="/images/index/icon.png" alt="背景" class="background-circle">
            </div>
            <h3 class="feature-title"><span class="feature-number">01</span> 柔軟な働き方</h3>
            <p class="feature-description">時短勤務やリモートワークといった柔軟な働き方を提案。キャリアを継続しながらプライベートも大切にできます。</p>
            <img src="/images/index/top-image2.jpg" alt="柔軟な働き方" class="feature-image">
        </div>
        <div class="feature">
        <div class="h-1 w-full bg-gradient-to-r from-[#66CFD5] to-[#A4E0E4]"></div>
            <div class="feature-background">
                <img src="/images/index/icon.png" alt="背景" class="background-circle">
            </div>
            <h3 class="feature-title"><span class="feature-number">02</span> コア人材</h3>
            <p class="feature-description">スキルや経験を活かして「コア人材」として企業に貢献できるポジションを提供します。</p>
            <img src="/images/index/top-image1.jpg" alt="コア人材" class="feature-image">
        </div>
        <div class="feature">
        <div class="h-1 w-full bg-gradient-to-r from-[#66CFD5] to-[#A4E0E4]"></div>
            <div class="feature-background">
                <img src="/images/index/icon.png" alt="背景" class="background-circle">
            </div>
            <h3 class="feature-title"><span class="feature-number">03</span> ライフステージ特化</h3>
            <p class="feature-description">ライフイベントを重視する数年間の働く機会提供に特化し、キャリア離脱とならない機会提供を目指します。</p>
            <img src="/images/index/top-image3.jpeg" alt="ライフステージ特化" class="feature-image">
        </div>
    </div>
</section>
    </main>

        <!-- HOWセクション -->
        <section id="how" class="how-section">
    <h2 class="how-title">HOW</h2>
    <p class="how-subtitle">サービス利用の流れ</p>
    <div class="how-steps">
        <div class="how-step">
            <div class="how-label life-event">
                <span>ライフイベント期</span>
            </div>
            <div class="how-content">
                <div class="step">
                <div class="step-left">
                    <span class="step-number">01</span>
                    <span class="step-title">利用登録</span>
                </div>
                    <p class="step-description">BE SHIFTへの利用登録を行います。</p>
                </div>
                <div class="step">
                <div class="step-left">
                    <span class="step-number">02</span>
                    <span class="step-title">キャリア登録</span>
                    </div>
                    <p class="step-description">マイページから希望のキャリアや経験スキルを登録します。</p>
                </div>
                <div class="step">
                <div class="step-left">
                    <span class="step-number">03</span>
                    <span class="step-title">キャリア面談</span>
                    </div>
                    <p class="step-description">キャリア面談を行います。休職中からでも利用できます。</p>
                </div>
                <div class="step">
                <div class="step-left">
                    <span class="step-number">04</span>
                    <span class="step-title">仕事オファー</span>
                    </div>
                    <p class="step-description">経験や希望に合う仕事が見つかり次第、採用オファーをします。</p>
                </div>
            </div>
        </div>
        <div class="how-step">
            <div class="how-label after-event">
                <span>終了後</span>
            </div>
            <div class="how-content">
                <div class="step">
                <div class="step-left">
                    <span class="step-number2">05</span>
                    <span class="step-title">転職 or 復帰支援</span>
                    </div>
                    <p class="step-description">ライフイベント期間終了後は元の企業への復帰や転職を支援します。</p>
                </div>
            </div>
        </div>
    </div>
</section>

    </main>

    <footer class="footer">
        <p>&copy; 2025 BE SHIFT. All rights reserved.</p>
    </footer>
    <script src="js/scripts.js"></script>
</body>
</html>
