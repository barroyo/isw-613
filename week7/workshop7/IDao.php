<?php

interface IDao {

  static function getAll($limit);

  static function get($id);

  static function save($data);

  static function update($data);

  static function delete($id);
}