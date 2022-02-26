import { Component, Input, OnInit } from '@angular/core';
import { Meal } from 'src/app/shared/model/meal';
import { MealService } from 'src/app/shared/service/meal.service';

@Component({
  selector: 'app-selected-meal',
  templateUrl: './selected-meal.component.html',
  styleUrls: ['./selected-meal.component.css']
})
export class SelectedMealComponent implements OnInit {
  @Input() meal!:Meal
  constructor() { }

  ngOnInit(): void {
  }
  ngOnChange(){
    console.log(this.meal)

  }

}
