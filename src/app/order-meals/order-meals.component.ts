import { Component, OnInit, OnChanges } from '@angular/core';
import { Meal } from '../shared/model/meal';
import { MealService } from '../shared/service/meal.service';

@Component({
  selector: 'app-order-meals',
  templateUrl: './order-meals.component.html',
  styleUrls: ['./order-meals.component.css'],
})
export class OrderMealsComponent implements OnInit {
  constructor(private orderservice: MealService) {}

  display = true;
  listOrder!: Array<Meal>;
  uniqueOrder!: Meal[];

  ngOnInit(): void {
    this.listOrder = this.orderservice.orderarray;
    this.uniqueOrder = this.orderservice.uniqueOrde;
    console.log(this.listOrder);

    if (this.listOrder.length > 0) {
      this.display = false;
    }
  }

  delateMeal(order: Meal) {
    // let index = this.uniqueOrder!.findIndex((ele) => ele.id == order.id);
    // // if (this.listOrder![index].count == 1) {
    //   this.uniqueOrder!.splice(index, 1);
    // // } else if (this.listOrder![index].count > 1) {
    // //   this.listOrder![index]!.count--;
    // // }
    // if (this.uniqueOrder.length == 0) {
    //   this.display = true;
    // }
  }

  checkout() {
    let total = 0;
    for (let i = 0; i < this.uniqueOrder.length; i++) {
      total = total + this.uniqueOrder[i].price*this.uniqueOrder[i].count;
    }
    return total;
  }
  addQty(meal: Meal) {
    meal.count++;
  }
  decQty(meal: Meal) {
    if (meal.count == 1) {
      // this.uniqueOrder.splice(
      // this.uniqueOrder.findIndex((element) => element.id == meal.id),1
      // );
      meal.count=1;
    } else {
      meal.count--;
    }
  }
  makeorder() {
    // console.log(this.listOrder);
    // for(let i=0;i<this.listOrder.length;i++){
    //     this.arrIDS[i]=(this.listOrder[i].id);
    // }
    // console.log(this.arrIDS);
  }
}
