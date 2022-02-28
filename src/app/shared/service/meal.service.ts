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
  uniqueOrde: Meal[] = [];

  addorder(meal: Meal) {
    if (this.orderarray.includes(meal)) {
      this.orderarray.push(meal);
      meal.count = 0;
      this.orderarray.forEach((element) => {
        if (element == meal) {
          meal.count++;
        }
      });
    } else {
      meal.count = 1;
      this.orderarray.push(meal);
      this.uniqueOrde.push(meal);
    }
  }
  additemtochart(product: Meal): Meal[] {
    var index = this.cartArray.findIndex((x) => x.id == product.id);
    if (index === -1) {
      this.cartArray.push(product);
    }
    const res = this.cartArray;
    console.log(res);
    return res;
  }
}
