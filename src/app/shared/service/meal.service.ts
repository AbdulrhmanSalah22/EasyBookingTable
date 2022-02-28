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
  meal=[ {id:1,name:"meal1",cat_id:1, price:100,img:"https://picsum.photos/200/300",option:['option1','option2']  },{id:1,name:"meal2", price:200,img:"https://picsum.photos/200/300",cat_id:1,option:['option3','option4']  },{id:1,name:"meal3", price:300, img:"https://picsum.photos/200/300" ,cat_id:2}]
  SelectedMeal!: Meal;
  getAll() {
    // return this.Http.get<Meal>('http://localhost:8000/api/meals');
    console.log(this.meal);
    return this.meal;
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
    // if (this.orderarray.includes(meal)) {
    //   this.orderarray.push(meal);
    //   meal.count = 0;
    //   this.orderarray.forEach((element) => {
    //     if (element == meal) {
    //       meal.count++;
    //     }
    //   });
    // } else {
    //   meal.count = 1;
    //   this.orderarray.push(meal);
    //   this.uniqueOrde.push(meal);

  //   meal.count=1;
  //   var index =this.orderarray.findIndex(x => x.id == meal.id)
  //   if (index === -1) {      
  //  this.orderarray.push(meal); 
  //   }
  //   console.log(this.orderarray);
    // return this.orderarray;
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
