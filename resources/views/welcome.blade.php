<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Articles</title>
    <!-- Add Bootstrap or Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto my-10">
        <h1 class="text-3xl font-bold">Blog Articles</h1>

        <form id="search-form" class="mt-10 mb-10">
            <input type="text" name="search" placeholder="Search articles..." class="border rounded p-2 w-full mb-4">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Search</button>
        </form>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- This is where the articles will be displayed -->
        </div>

        <div class="mt-4 text-center" id="no-articles-message" style="display: none;">
            <p>No articles found.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetchArticles(); // Fetch articles on initial load

            document.getElementById('search-form').addEventListener('submit', function (e) {
                e.preventDefault();
                fetchArticles();
            });
        });

        function fetchArticles() {
            const search = document.querySelector('input[name="search"]').value;
            axios.get(`/articles?search=${search}`)
                .then(response => {
                    const articles = response.data;
                    displayArticles(articles);
                })
                .catch(error => {
                    console.error(error);
                });
        }

        function displayArticles(articles) {
            const container = document.querySelector('.grid');
            container.innerHTML = '';

            if (articles.length === 0) {
                document.getElementById('no-articles-message').style.display = 'block'; // Show no articles message
            } else {
                document.getElementById('no-articles-message').style.display = 'none'; // Hide no articles message
                articles.forEach(article => {
                    const articleElement = `
                        <div class="border p-4 rounded">
                            <h2 class="text-xl font-semibold">${article.title}</h2>
                            <p>${article.content.substring(0, 100)}...</p>
                            <a href="/articles/${article.id}" class="text-blue-500">Read more</a>
                        </div>
                    `;
                    container.innerHTML += articleElement;
                });
            }
        }
    </script>
</body>
</html>
