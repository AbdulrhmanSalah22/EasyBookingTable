import { Component, Input, OnInit } from '@angular/core';
import { Category } from '../shared/model/category';
import { Meal } from '../shared/model/meal';
import { CategoryService } from '../shared/service/category.service';
import { MealService } from '../shared/service/meal.service';

@Component({
  selector: 'app-meal-page',
  templateUrl: './meal-page.component.html',
  styleUrls: ['./meal-page.component.css']
})
export class MealPageComponent implements OnInit {
  SelectedMeal!:Meal
  Category!:Category

  constructor(private MealService:MealService,private CategoryService:CategoryService) { }

  ngOnInit(): void {
    this.MealService.getById().subscribe(meal=>{
      this.SelectedMeal=meal
    })
    this.CategoryService.getById().subscribe(category=>{
      this.Category=category
    })
    // this.SelectedMeal=this.MealService.SelectedMeal
    // console.log(this.SelectedMeal)

  }
  

}
