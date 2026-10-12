<?php

$title = "International HOK Academy | International Academy of Medical Excellence";
$keywords = "About HOK Academy, HOK Academy, International Academy of Medical Excellence, medical academy India, international medical education, medical training, clinical education, healthcare professional development, aesthetic medicine training, medical courses India";
$description = "Learn about HOK Academy, an international academy providing advanced medical education, clinical training and professional development for doctors, surgeons and healthcare professionals.";
$canonical = "https://hokacademy.com/international.php";
ob_start();
?>


<main id="main">

    <!-- Paste inside <main id="main"> of about.html (header above, footer below stay the same) -->

    <!-- ============ ABOUT HERO START ============ -->
    <section class="ab-hero" aria-labelledby="abTitle">
        <div class="container">
            <nav aria-label="Breadcrumb">
                <ol class="ab-crumb">
                    <li><a href="index.php">Home</a></li>
                    <li aria-current="page">International </li>
                </ol>
            </nav>
            <h1 id="abTitle">International Academy of Medical Excellence</h1>
            <p class="ab-hero-tag">
                <span>Advancing Medical Knowledge.</span>
                <span>Transforming Clinical Practice.</span>
                <span>Connecting Expertise Across Borders.</span>
            </p>
        </div>
    </section>
    <!-- ============ ABOUT HERO END ============ -->


</main>


<?php
$content = ob_get_clean();
include_once  'layout.php';
?>