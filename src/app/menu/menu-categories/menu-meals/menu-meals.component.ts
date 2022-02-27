import { Component, Input, OnInit } from '@angular/core';
import { MealService } from 'src/app/shared/service/meal.service';

@Component({
  selector: 'app-menu-meals',
  templateUrl: './menu-meals.component.html',
  styleUrls: ['./menu-meals.component.css']
})
export class MenuMealsComponent implements OnInit {

  @Input() mymeal!:any;
  constructor(private mealservice:MealService) { }

  ngOnInit(): void {
    console.log(this.mymeal);
    // for(let i=0;i<this.mymeal.length;i++ ){
    //   console.log(this.mymeal[i].name);
    // }
  }
  getMeal(mymeal:any){
    console.log(mymeal.id);
// this.mealservice.getmealbyID(mymeal.id);
// this.mealservice.itemAdded.emit(mymeal);
// this.mealservice.addItemToCart(this.mymeal);
  }
  addorder(mymeal:any){
    this.mealservice.addorder(mymeal);
  }
}
