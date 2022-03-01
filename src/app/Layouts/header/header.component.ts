import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Meal } from 'src/app/shared/model/meal';
import { MealService } from 'src/app/shared/service/meal.service';


@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
show:boolean=true
mealarra!:number;
  reserve:any="reserve";
  constructor(private router:Router,private mealservice:MealService) { }

  ngOnInit(): void {
    this.mealarra=this.mealservice.orderarray.length;
    console.log(this.mealarra);
  }
  freg(reserve:string)
  {
    this.router.navigateByUrl('#'+reserve);
  }

  number() {
  return  this.mealarra=this.mealservice.orderarray.length;
  }
  getfev(){
    this.mealservice.getallfev().subscribe(
      (next)=>{console.log(next)},
      (error)=>{console.log(error)}
    )
  }
}
