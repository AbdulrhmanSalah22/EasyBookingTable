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
mealarra!:Array<Meal>;
  reserve:any="reserve";
  constructor(private router:Router,private mealservice:MealService) { }

  ngOnInit(): void {
    this.mealarra=this.mealservice.orderarray;
    console.log(this.mealarra);
  }
  freg(reserve:string)
  {
    this.router.navigateByUrl('#'+reserve);
  }
  number() {
    let num2 = 0;
    if (this.mealarra.length > 0) {
      for (let i = 0; i < this.mealarra.length; i++) {
        num2 = num2 + this.mealarra[i].count;
      }
      return num2;
    }
    else {
      return 0;
    }
  }
}
