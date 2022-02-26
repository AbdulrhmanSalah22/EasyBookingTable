import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {

  reserve:any="reserve";
  constructor(private router:Router) { }

  ngOnInit(): void {
  }
  freg(reserve:string)
  {
    this.router.navigateByUrl('#'+reserve);
  }
}
