import { HttpClient } from '@angular/common/http';
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
  getAll() {
    return this.Http.get<Meal>('http://localhost:8000/api/meals');
  }
  display(meal: Meal) {
    this.SelectedMeal = meal;
  }
  getById() {
    return this.Http.get<Meal>(
      `http://localhost:8000/api/meals/${this.SelectedMeal.id}`
    );
  }

  constructor(private Http: HttpClient) {}
  cartArray: Meal[] = [];
  orderarray: Meal[] = [];
  uniqueOrde:Meal[] = [];


  addorder(meal: Meal){

  //         this.orderarray.push(meal);
  //         this.orderarray.forEach(element=>{
  //           if (!this.uniqueOrde.includes(element)) {
  //             this.uniqueOrde.push(element);
            }
  //          })  
    // if (this.orderarray.includes(meal)) {
    //   this.orderarray.push(meal);
    // } else {
    //   this.orderarray.push(meal);
    //   this.uniqueOrde.push(meal);
    //   console.log('object already exists');
    //   console.log( this.uniqueOrde)
    // }
  }
}
