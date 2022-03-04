import { Component, Input, OnInit } from '@angular/core';
import { Meal } from 'src/app/shared/model/meal';
import { FavouriteService } from 'src/app/shared/service/favourite.service';
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
  constructor(private MealService:MealService,
    private OrderService:OrderService,
    private FavouriteService:FavouriteService) { }

  ngOnInit(): void {
  }
  ShowMeal(meal:Meal){
    this.MealService.display(meal)
  }

  addorder(mymeal:any){
    this.OrderService.addorder(mymeal);
  }
  
  addFavourite(mymeal:any)
  {
    if(localStorage.getItem('toke')){
      let data={id:mymeal.id}
      console.log(data)
       this.FavouriteService.sendfev(data).subscribe(
         (next)=>{console.log(next)},
         (error)=>{console.log(error)}
       );      
    }else{
      this.FavouriteService.addToLocalFev(mymeal);    }
 
  }

}
