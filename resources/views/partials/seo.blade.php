@php
    $siteTitle = \App\Models\Setting::get('site_title', 'HOK Academy | International Academy of Medical Excellence');
    $siteLogo = \App\Models\Setting::get('site_logo', 'assets/img/logo.jpg');
    $siteFavicon = \App\Models\Setting::get('site_favicon', 'assets/img/logo.jpg');
    
    $metaTitle = $page->meta_title ?? ($title ?? $siteTitle);
    $metaDesc = $page->meta_description ?? ($description ?? 'HOK Academy is an international academy for advanced medical education, clinical training and professional development across aesthetic medicine, injectables, laser, surgery and more.');
    $metaKeywords = $page->meta_keywords ?? ($keywords ?? 'HOK Academy, medical training, aesthetic medicine courses, international medical academy India');
    $canonical = $page->canonical_url ?? ($canonical_url ?? url()->current());
    $ogImg = !empty($page->og_image) ? asset($page->og_image) : asset($siteLogo);
    $customHead = \App\Models\Setting::get('custom_head_scripts', '');
@endphp

<title>{{ $metaTitle }}</title>
<meta name="description" content="{{ $metaDesc }}">
<meta name="keywords" content="{{ $metaKeywords }}">
<link rel="canonical" href="{{ $canonical }}">
<meta name="theme-color" content="#071d3a">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:title" content="{{ $metaTitle }}">
<meta property="og:description" content="{{ $metaDesc }}">
<meta property="og:image" content="{{ $ogImg }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ $canonical }}">
<meta property="twitter:title" content="{{ $metaTitle }}">
<meta property="twitter:description" content="{{ $metaDesc }}">
<meta property="twitter:image" content="{{ $ogImg }}">

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset($siteFavicon) }}" type="image/x-icon">

<!-- Custom Injected Head Scripts -->
{!! $customHead !!}

