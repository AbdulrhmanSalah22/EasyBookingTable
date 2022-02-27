import { Component, OnInit ,Input} from '@angular/core';
import { MealService } from 'src/app/shared/service/meal.service';

@Component({
  selector: 'app-menu-categories',
  templateUrl: './menu-categories.component.html',
  styleUrls: ['./menu-categories.component.css']
})
export class MenuCategoriesComponent implements OnInit {

  // meals:Array<any>=[
  //   {id:1,name:"meal11"},
  //   {id:2,name:"meal21"},
  //   {id:3,name:"meal3"},
  //   {id:4,name:"meal4"},
  // ]
  meals!:Array<any>;
  @Input() category!:any;
  constructor(private mealsevice:MealService) {}

  ngOnInit(): void {
    this.meals=this.mealsevice.getAll();
  }

}
