Context : when on a page vizualising the book, I want to see all
the books written by the book's author in the sidebar.

So when accessing the book page, I need to retrieve the author
of the book and a collection of the books he wrote.

When fetching :

    GET /api/books/1

Expected result :

    {
        "@context": "/api/contexts/Book",
        "@id": "/api/books/1",
        "@type": "Book",
        "author": {
            "@id": "/api/authors/1",
            "@type": "Author",
            "books": [
                {
                    "@id": "/api/books/1",
                    "@type": "Book",
                    "author": "/api/authors/1"
                },
                {
                    "@id": "/api/books/2",
                    "@type": "Book",
                    "author": "/api/authors/1"
                }
            ]
        }
    }

Actual result :

    {
        "@context": "/api/contexts/Book",
        "@id": "/api/books/1",
        "@type": "Book",
        "author": {
            "@id": "/api/authors/1",
            "@type": "Author",
            "books": [
                "/api/books/1",
                {
                    "@id": "/api/books/2",
                    "@type": "Book",
                    "author": "/api/authors/1"
                }
            ]
        }
    }
