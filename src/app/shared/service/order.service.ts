import { Injectable } from '@angular/core';
import { Meal } from '../model/meal';

@Injectable({
  providedIn: 'root',
})
export class OrderService {
  constructor() {}
  cartArray: Meal[] = [];
  orderarray: Meal[] = [];
  uniqueOrder: Meal[] = [];
  arr: Meal[] = [...this.orderarray];

  orderSum: number = 0;

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
      this.uniqueOrder.push(meal);
    }
    console.log(meal);
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
  addQty(meal: Meal) {
    meal.count++;
    this.orderarray.push(meal);
  }
  decQty(meal: Meal) {
    meal.count--;
    this.orderarray.splice(this.orderarray.indexOf(meal), 1);
    console.log(meal);
    if (meal.count == 0) {
      this.uniqueOrder.splice(this.uniqueOrder.indexOf(meal), 1);
    }
  }
  deleteMeal(meal: Meal) {
    this.uniqueOrder.splice(this.uniqueOrder.indexOf(meal), 1);
    for (var i = this.orderarray.length - 1; i >= 0; i--) {
      if (this.orderarray[i] === meal) {
        this.orderarray.splice(i, 1);
      }
    }
  }
  DeleteOrder() {
    this.orderarray.length = 0;
    this.uniqueOrder.length = 0;
  }
}

// for(let i=0;i<this.orderarray.length+1;i++){
//     if(this.orderarray[i].id==meal.id){
//     this.orderarray.splice(i, 1);
//     }

// addorder(meal: Meal) {
// if (this.orderarray.length == 0) {
//   this.orderarray.push(meal);
//   this.uniqueOrder.push(meal);
// } else {
//   this.uniqueOrder.find((elemen) => {
//     if (elemen.id==meal.id) {
//       this.orderarray.push(meal);
//       meal.count = 0;
//       this.orderarray.forEach((element) => {
//         if (element == meal) {
//           meal.count++;
//         }
//       });
//     } else {
//       console.log(meal);
//       meal.count = 1;
//       this.orderarray.push(meal);
//       this.uniqueOrder.push(meal);
//     }
//   });
// }

// }
