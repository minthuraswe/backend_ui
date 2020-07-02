<?php

function flash()
{
    session()->flash('success', '1 row affected');
}

function searchdata()
{
    session()->flash('search_member', 'No member found!!');
    session()->flash('search_activity', 'No activity found!!');
    session()->flash('search_post', 'No post found!!');
    session()->flash('search_category', 'No category found!!');
}

function checkExists($value){
    session()->flash('error', $value . ' is added. Try another!!');
}

function checkNumeric(){
    session()->flash('errorcategory', 'The category can not be number. Try again!!');
}

function imagePath() 
{
    return public_path('uploads/');
}
