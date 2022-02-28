import { Component, OnInit } from '@angular/core';
import { Meal } from '../shared/model/meal';
import { MealService } from '../shared/service/meal.service';

@Component({
  selector: 'app-favourite',
  templateUrl: './favourite.component.html',
  styleUrls: ['./favourite.component.css']
})
export class FavouriteComponent implements OnInit {
  mealarray!:Array<Meal>;
  constructor(private mealservice:MealService) { }

  ngOnInit(): void {
    this.mealarray=this.mealservice.cartArray;
    
  }
  delete(product:Meal) {
    this.mealarray.splice(this.mealarray.indexOf(product), 1);
  }

}