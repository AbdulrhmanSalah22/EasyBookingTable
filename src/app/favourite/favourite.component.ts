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
    // this.mealarray.splice(this.mealarray.indexOf(product), 1);
  // let  data={id:product.id}
  delete(mymea:Meal) {  
    if(localStorage.getItem('toke')){
      this.mealservice.deleteFev(mymea.id).subscribe(
        (next)=>{console.log("delete")},
        (error)=>{console.log(error)}
      );
    }
  else{
     this.mealarray.splice(this.mealarray.indexOf(mymea), 1);
  }
     // this.mealarray.splice(this.mealarray.indexOf(mymea), 1);
  // let  data={id:product.id}
  }
  getfev(){
    this.mealservice.getallfev().subscribe(
      (next)=>{console.log(next)},
      (error)=>{console.log(error)}
    )
  }
}