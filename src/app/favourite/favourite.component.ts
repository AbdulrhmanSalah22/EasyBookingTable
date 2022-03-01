import { Component, OnInit } from '@angular/core';
import { Meal } from '../shared/model/meal';
import { MealService } from '../shared/service/meal.service';
import { OrderService } from '../shared/service/order.service';

@Component({
  selector: 'app-favourite',
  templateUrl: './favourite.component.html',
  styleUrls: ['./favourite.component.css']
})
export class FavouriteComponent implements OnInit {
  mealarray!:Array<Meal>;
  constructor(private mealservice:MealService,private OrderService:OrderService) { }

  ngOnInit(): void {
    this.mealarray=this.OrderService.cartArray;
    
  }
  delete(product:Meal) {
    this.mealarray.splice(this.mealarray.indexOf(product), 1);
  }

}