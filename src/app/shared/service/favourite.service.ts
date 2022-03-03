import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Meal } from '../model/meal';

@Injectable({
  providedIn: 'root'
})
export class FavouriteService {
  sendfev(id:any):Observable<Meal>{
    const headers = new HttpHeaders({
      Authorization: localStorage.getItem('toke')??""
    })
    return this.Http.post<Meal>('http://127.0.0.1:8000/api/add-fav',id,{headers});
  }

  getFev():Observable<Meal[]>{
    const headers = new HttpHeaders({
      Authorization: localStorage.getItem('toke')??""
    })
    return this.Http.get<Meal[]>('http://localhost:8000/api/get-fav',{headers});
  }

  deleteFev(id:any):Observable<Meal>{
    const headers = new HttpHeaders({
      Authorization: localStorage.getItem('toke')??""
    })
    return this.Http.post<Meal>(`http://localhost:8000/api/delete-fav/${id}`,'blog' ,{headers});
  }

  constructor(private Http: HttpClient) { }
}
