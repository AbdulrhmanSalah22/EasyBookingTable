import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Category } from '../model/category';
import { MealService } from './meal.service';

@Injectable({
  providedIn: 'root',
})
export class CategoryService {
  cat!:any
  constructor(private Http:HttpClient,private MealService:MealService) {}

  getAll() {
  return this.Http.get<Category>('http://localhost:8000/api/category',{
    headers:new HttpHeaders({token:'hello'})
  })
   }
   getById() {
    return this.Http.get<Category>(`http://localhost:8000/api/category/${this.MealService.SelectedMeal.cat_id}`)
  }
}
