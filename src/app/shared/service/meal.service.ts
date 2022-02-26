import { HttpClient } from '@angular/common/http';
import { EventEmitter, Injectable } from '@angular/core';
import { Meal } from '../model/meal';

@Injectable({
  providedIn: 'root'
})
export class MealService {

  SelectedMeal!:Meal
 
  getAll() {
    return this.Http.get<Meal>('http://localhost:8000/api/meals')
  }
display(meal:Meal){
this.SelectedMeal=meal
}
getById() {
  return this.Http.get<Meal>(`http://localhost:8000/api/meals/${this.SelectedMeal.id}`)
}

  constructor(private Http:HttpClient) { }
}
