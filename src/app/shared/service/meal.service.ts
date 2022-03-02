import { HttpClient, HttpHeaders } from '@angular/common/http';
import { EventEmitter, Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Login } from '../model/login';
import { Meal } from '../model/meal';
import { Resgister } from '../model/register';

@Injectable({
  providedIn: 'root',
})
export class MealService {
  SelectedMeal!: Meal;
  getAll(): Observable<Meal> {
    return this.Http.get<Meal>('http://localhost:8000/api/get-meal');
  }
  display(meal: Meal) {
    this.SelectedMeal = meal;
  }
  getById(): Observable<Meal> {
    return this.Http.get<Meal>(
      `http://localhost:8000/api/get-meal/${this.SelectedMeal.id}`
    );
  }
 
  constructor(private Http: HttpClient) {}
  
}
