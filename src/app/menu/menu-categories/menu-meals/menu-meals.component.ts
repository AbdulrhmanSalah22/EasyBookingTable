import { Component, Input, OnInit } from '@angular/core';
import { Meal } from 'src/app/shared/model/meal';
import { MealService } from 'src/app/shared/service/meal.service';
import { OrderService } from 'src/app/shared/service/order.service';

@Component({
  selector: 'app-menu-meals',
  templateUrl: './menu-meals.component.html',
  styleUrls: ['./menu-meals.component.css']
})
export class MenuMealsComponent implements OnInit {
  @Input() id!:number;
  @Input() meal!:Meal;
  constructor(private MealService:MealService,private OrderService:OrderService) { }

  ngOnInit(): void {
  }
  ShowMeal(meal:Meal){
    this.MealService.display(meal)
  }

  addorder(mymeal:any){
    this.OrderService.addorder(mymeal);
    console.log(mymeal)
  }
  getmeal(mymeal:any)
  {
   this.OrderService.additemtochart(mymeal)
  }
}
