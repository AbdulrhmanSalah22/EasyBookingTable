import { Component, OnInit } from '@angular/core';
import { Meal } from 'src/app/shared/model/meal';
import { MealService } from 'src/app/shared/service/meal.service';

@Component({
  selector: 'app-special-dishes',
  templateUrl: './special-dishes.component.html',
  styleUrls: ['./special-dishes.component.css']
})
export class SpecialDishesComponent implements OnInit {

  SpecialMeal!:Array<Meal>
  constructor(private MealService:MealService) { }

  ngOnInit(): void {
    this.SpecialMeal=this.MealService.getAll().slice(0,2);
    console.log(this.SpecialMeal);
  }

}
