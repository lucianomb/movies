# movies

This project uses the plugin *Movies for Moxie* to create an interface in Wordpress for creating a movie library.

### Plugin Movies for Moxie

#### How to use
1. Enable the plugin
2. Go to "Movies" in your WP dashboard
3. Create a new movie by adding its name, a poster, rating, year of release and a short description
4. After publishing it will appear on home page

#### Shortcode
You can add a gallery in any page by using the shortcode

```json
[list-movies]
```

#### Cache
The catalog is cached.
The cache is flushed everytime a movie is saved/published.