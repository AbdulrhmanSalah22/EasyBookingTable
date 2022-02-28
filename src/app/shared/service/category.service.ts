import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Category } from '../model/category';
import { MealService } from './meal.service';

@Injectable({
  providedIn: 'root',
})
export class CategoryService {
  cat!: any;
  categor=[
    {id:1,name:"cat1",image:"https://picsum.photos/200/300"},
    {id:2,name:"cat2",image:"https://picsum.photos/200/300"},
    {id:3,name:"cat3",image:"https://picsum.photos/200/300"},
  ]
  constructor(private Http: HttpClient, private MealService: MealService) {}

  getAll() {
    // return this.Http.get<Category>('http://localhost:8000/api/category', {
    //   headers: new HttpHeaders({ token: 'hello' }),
    // });
    return this.categor;
  }
  getById() {
    return this.Http.get<Category>(
      `http://localhost:8000/api/category/${this.MealService.SelectedMeal.cat_id}`
    );
  }
}
