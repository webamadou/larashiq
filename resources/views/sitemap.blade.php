<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($urls as $url)
        <url>
            <loc>{{ $url->url }}</loc>
            <lastmod>{{ $url->lastModificationDate->format('Y-m-d') }}</lastmod>
            <changefreq>{{ $url->changeFrequency }}</changefreq>
            <priority>{{ $url->priority }}</priority>
        </url>
    @endforeach
</urlset>
