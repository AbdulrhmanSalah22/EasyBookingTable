import { Component, Input, OnInit } from '@angular/core';
import { Meal } from 'src/app/shared/model/meal';
import { MealService } from 'src/app/shared/service/meal.service';

@Component({
  selector: 'app-menu-meals',
  templateUrl: './menu-meals.component.html',
  styleUrls: ['./menu-meals.component.css']
})
export class MenuMealsComponent implements OnInit {
  @Input() id!:number;
  @Input() meal!:Meal;
  constructor(private MealService:MealService) { }

  ngOnInit(): void {
  }
  ShowMeal(meal:Meal){
    this.MealService.display(meal)
  }

  addorder(mymeal:any){
    this.MealService.addorder(mymeal);
    console.log(mymeal)
  }
  getmeal(mymeal:any)
  {
    console.log(mymeal.id);
   this.MealService.additemtochart(mymeal);
   this.MealService.sendfo(mymeal.id).subscribe(
     (next)=>{console.log(next)},
     (error)=>{console.log(error)}
   );
  }
}
