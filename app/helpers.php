<?php
function discounted($product)
{
    return number_format((($product->original_price - $product->selling_price) / $product->original_price) * 100, 0);
}

function originalPrice($product)
{
    return number_format($product->original_price, 0, ',', '.');
}

function sellingPrice($product)
{
    return number_format($product->selling_price, 0, ',', '.');
}