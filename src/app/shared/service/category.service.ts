import { Injectable } from '@angular/core';
import { Category } from '../model/category';

@Injectable({
  providedIn: 'root',
})
export class CategoryService {
  constructor() {}
  categories: Array<Category> = [
    {
      name: 'cat1',
      id: 1,
      img: 'https://picsum.photos/200/300',
    },
    {
      name: 'cat2',
      id: 2,
      img: 'https://picsum.photos/200/300',
    },
    {
      name: 'cat3',
      id: 3,
      img: 'https://picsum.photos/200/300',
    },
  ];
  getAll() {
    return this.categories;
  }
}
