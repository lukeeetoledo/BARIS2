self.addEventListener("install", e => {
    e.waitUntil(
        caches.open ("static").then(cache => {
            return cache.addAll(["", "home.php", "CSS/landing.css", "img/Logo_192.png", "img/FINAL_LANDSCAPE.png"]);
        })
  ) ;
});
self.addEventListener ("fetch", e => {
    e.respondWith(
        caches.match(e.request).then (response =>{
            return response || fetch(e.request);
        })
    );
});