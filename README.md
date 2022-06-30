# Jel Svijeta API

## ⭐ Installation
1. Clone the repo and `cd` into it.
2. Open the terminal and write this command `composer install`
3. Rename or copy `.env.example` file to `.env` and write required database information.
4. Run `php artisan key:generate` command.
5. Run `php artisan migrate --seed` command for table creation and seeding.
<hr>

**JSON example:**

```js
{
    meta: {
        currentPage: 1,
        totalItems: 140,
        itemsPerPage: 15,
        totalPages: 10
    },
    data: [
        {
            id: 1,
            title: "Meal-Title - HR - id sapiente placeat",
            description: "Meal-Description - HR - Veniam tempora eum non delectus cumque excepturi cum autem.",
            status: "created",
            category: {
                id: 1,
                title: "Category- 1 - HR - error at enim",
                slug: "category-1"
            },
            tags: [
                {
                    id: 13,
                    title: "Tag- 13 - HR - laudantium qui aliquid",
                    slug: "tag-13"
                }
            ],
            ingredients: [
                {
                    id: 15,
                    title: "Ingredient- 15 - HR - numquam incidunt molestias",
                    slug: "ingredient-15"
                },
                {
                    id: 21,
                    title: "Ingredient- 21 - HR - consequatur temporibus expedita",
                    slug: "ingredient-21"
                },
                {
                    id: 22,
                    title: "Ingredient- 22 - HR - dignissimos quis dolor",
                    slug: "ingredient-22"
                },
                {
                    id: 41,
                    title: "Ingredient- 41 - HR - officiis et dicta",
                    slug: "ingredient-41"
                }
            ]
        },
    ]
}
```
