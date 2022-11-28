<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    /**
     * It show that a product is associated with one category
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Many to many relationship
     *
     * @return BelongsToMany
     */
    public function commands(): BelongsToMany
    {
        return $this->belongsToMany(Command::class);
    }

    /**
     * get the latest added product
     *
     * @param int $count
     *
     * @return mixed
     */
    public function getLatestProducts($count = 6)
    {
        return $this->with(['category'])
            ->limit($count)
            ->orderBy('products.created_at', 'desc')
            ->get()
        ;
    }

    /**
     * Search a specified product which matches the criteria
     *
     * @param int $category category's id
     * @param string $criteria
     *
     * @return mixed
     */
    public function findBy($category, $criteria)
    {

        if($category === 'all') {

            return $this->with(['category'])
                ->where('name', 'LIKE', '%' . $criteria . '%')
                ->orWhere('description', 'LIKE', "%$criteria%")
                ->get()
            ;

        } else {

            return $this->with(['category'])
                ->where('category_id', '=', $category)
                ->where('name', 'LIKE', '%' . $criteria . '%')
                ->where('description', 'LIKE', "%$criteria%")
                ->get()
            ;

        }

    }
}
