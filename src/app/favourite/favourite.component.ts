import { Component, OnInit } from '@angular/core';
import { Meal } from '../shared/model/meal';
import { FavouriteService } from '../shared/service/favourite.service';
import { MealService } from '../shared/service/meal.service';
import { OrderService } from '../shared/service/order.service';

@Component({
  selector: 'app-favourite',
  templateUrl: './favourite.component.html',
  styleUrls: ['./favourite.component.css']
})
export class FavouriteComponent implements OnInit {
  FevArray!:Array<Meal>;
  constructor(private MealService:MealService,
    private OrderService:OrderService,
    private FavouriteService:FavouriteService) { }

  ngOnInit(): void {
    this.getfev()
    // this.FevArray=this.OrderService.cartArray;
    
  }
  getfev(){
    if(localStorage.getItem('toke')){
      this.FavouriteService.getFev().subscribe(
        (next)=>{
         this.FevArray=next
        },
        (error)=>{console.log(error)}
      )
    }else{
      this.FevArray=this.FavouriteService.FevArray
      console.log(this.FevArray)

    }
   
  }
  delete(meal:Meal) {  
    this.FavouriteService.deleteFev(meal.id).subscribe(
      (next)=>{console.log(next)},
      (error)=>{console.log(error)}
    );
  }
  ShowMeal(meal:Meal){
    this.MealService.display(meal)
  }
}