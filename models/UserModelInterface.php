<?php
namespace models;
interface UserModelInterface{
    public function index();
    public function store();
    public function delete($id);
    public function edit($id);
    public function show($id);
    public function update();
    public function buyList($id);
    public function buy($product_id,$user);
}