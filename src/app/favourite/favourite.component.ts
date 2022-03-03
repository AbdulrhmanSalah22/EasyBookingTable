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
  array!:any;
  constructor(private mealservice:MealService,
    private OrderService:OrderService,
    private FavouriteService:FavouriteService) { }

  ngOnInit(): void {
    this.getfev()
    this.array=this.OrderService.cartArray;
    
    
  }
  getfev(){
    this.FavouriteService.getFev().subscribe(
      (next)=>{
        console.log(next);
        
       this.array=next
      },
      (error)=>{console.log(error)}
    )
  }
  delete(meal:Meal) {  
    this.FavouriteService.deleteFev(meal.id).subscribe(
      (next)=>{
        this.getfev()
        console.log(next)},
      (error)=>{console.log(error)}
    );
  }
}