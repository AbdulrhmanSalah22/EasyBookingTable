import { Component, OnInit } from '@angular/core';
import { CategoryService } from '../shared/service/category.service';
import { MealService } from '../shared/service/meal.service';

@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html',
  styleUrls: ['./menu.component.css']
})
export class MenuComponent implements OnInit {
categories!:any
  constructor(private CategoryService:CategoryService,private MealService:MealService) { }

  ngOnInit(): void {
    this.CategoryService.getAll().subscribe(categories=>{
      this.categories=categories
      });
  }

}
